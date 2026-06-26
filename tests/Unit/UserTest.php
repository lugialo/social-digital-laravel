<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_is_admin_returns_true_for_admin_role(): void
    {
        $user = new User(['role' => 'admin']);

        $this->assertTrue($user->isAdmin());
    }

    public function test_is_admin_returns_false_for_user_role(): void
    {
        $user = new User(['role' => 'user']);

        $this->assertFalse($user->isAdmin());
    }

    public function test_is_admin_returns_false_when_role_is_null(): void
    {
        $user = new User();

        $this->assertFalse($user->isAdmin());
    }
}
