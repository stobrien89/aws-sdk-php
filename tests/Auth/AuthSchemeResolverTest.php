<?php

namespace Aws\Test\Auth;

use Aws\Auth\Exception\AuthException;
use Aws\Auth\AuthSchemeResolver;
use Aws\Identity\BearerTokenIdentity;
use Aws\Identity\IdentityInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class AuthSchemeResolverTest extends TestCase
{
    public function testUsesDefaultSchemeMapWhenNoneProvided()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        $this->assertEquals('v4', $resolver->selectAuthScheme(['aws.auth#sigv4'], $identity));
    }

    public function testAcceptsCustomSchemeMap()
    {
        $customMap = ['custom.auth#example' => 'customScheme'];
        $resolver = new AuthSchemeResolver($customMap);
        $identity = $this->createMock(IdentityInterface::class);
        $this->assertEquals('customScheme', $resolver->selectAuthScheme(['custom.auth#example'], $identity));
    }

    public function testSelectAuthSchemeReturnsCorrectSchemeForIdentity()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(BearerTokenIdentity::class);
        $this->assertEquals('bearer', $resolver->selectAuthScheme(['smithy.api#httpBearerAuth'], $identity));
    }

    public function testSelectAuthSchemeThrowsExceptionWhenNoCompatibleScheme()
    {
        $this->expectException(AuthException::class);
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        $resolver->selectAuthScheme(['non.existent#scheme'], $identity);
    }

    public function testSelectAuthSchemePrioritizesFirstCompatibleScheme()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        // Assuming the identity is compatible with 'v4' but not 'v4a'
        $this->assertEquals('v4', $resolver->selectAuthScheme(['aws.auth#sigv4', 'aws.auth#sigv4a'], $identity));
    }

    public function testSelectAuthSchemeSkipsIncompatible()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        $this->assertEquals(
            'v4',
            $resolver->selectAuthScheme(['smithy.api#httpBearerAuth', 'aws.auth#sigv4'], $identity)
        );
    }

    public function testIsCompatibleAuthSchemeReturnsTrueForValidScheme()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        $reflection = new \ReflectionClass($resolver);
        $method = $reflection->getMethod('isCompatibleAuthScheme');
        $method->setAccessible(true);
        $this->assertTrue($method->invokeArgs($resolver, ['v4', $identity]));
    }

    public function testIsCompatibleAuthSchemeReturnsFalseForInvalidScheme()
    {
        $resolver = new AuthSchemeResolver();
        $identity = $this->createMock(IdentityInterface::class);
        $reflection = new \ReflectionClass($resolver);
        $method = $reflection->getMethod('isCompatibleAuthScheme');
        $method->setAccessible(true);
        $this->assertFalse($method->invokeArgs($resolver, ['invalidScheme', $identity]));
    }
}
