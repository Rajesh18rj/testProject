<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use Illuminate\Contracts\Auth\Authenticatable;
// Adjust the namespace if necessary


/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\LazilyRefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

// If we are need any helper function we need to define below this

//Everytime when we creating a new user , instead of create seperately and write full code we using this method as a Replacement

function loginAsUser(User $user = null): User
{
    $user = $user ?? User::factory()->create();
    /** @var Authenticatable $user */
    actingAs($user);                  #this indicates to the ide that $user should be treated as an instance of (i was import that in top)

    return $user;

}
