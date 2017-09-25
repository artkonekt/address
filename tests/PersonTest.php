<?php
/**
 * Contains the PersonTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-25
 *
 */


namespace Konekt\Address\Tests;


use Konekt\Address\Contracts\Person as PersonContract;
use Konekt\Address\Models\Gender;
use Konekt\Address\Models\NameOrder;
use Konekt\Address\Models\Person;
use Konekt\Address\Models\PersonProxy;
use Konekt\Enum\Enum;

class PersonTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $person = new Person();

        $this->assertInstanceOf(Person::class, $person);
    }

    /**
     * @test
     */
    public function implements_the_person_interface()
    {
        $person = new Person();

        $this->assertInstanceOf(PersonContract::class, $person);
    }

    /**
     * @test
     */
    public function person_proxy_returns_the_proper_class()
    {
        $this->assertEquals(Person::class, PersonProxy::modelClass());
    }

    /**
     * @test
     */
    public function can_be_created_with_minimal_data()
    {
        $person = PersonProxy::create([
            'firstname' => 'John',
            'lastname'  => 'Smith'
        ]);

        $this->assertInstanceOf(Person::class, $person);

        $person = $person->fresh();

        $this->assertEquals('John', $person->firstname);
        $this->assertEquals('Smith', $person->lastname);
    }

    /**
     * @test
     */
    public function nameorder_defaults_to_western()
    {
        $person = PersonProxy::create([
            'firstname' => 'Charlie',
            'lastname'  => 'Firpo'
        ]);

        $this->assertInstanceOf(Person::class, $person);

        $person = $person->fresh();

        $this->assertInstanceOf(Enum::class, $person->nameorder);
        $this->assertTrue(NameOrder::create()->equals($person->nameorder));
        $this->assertEquals(NameOrder::WESTERN, $person->nameorder->value());
    }

    /**
     * @test
     */
    public function name_can_be_retrieved_in_proper_naming_order()
    {
        $johnny = Person::create([
            'firstname' => 'Johnny',
            'lastname'  => 'Firpo'

        ]);

        $this->assertEquals('Johnny Firpo', $johnny->name());

        $puskas = PersonProxy::create([
            'firstname' => 'Ferenc',
            'lastname'  => 'Puskás',
            'nameorder' => NameOrder::EASTERN
        ]);

        $this->assertTrue(NameOrder::EASTERN()->equals($puskas->nameorder), 'Name order should be eastern');
        $this->assertEquals('Puskás Ferenc', $puskas->name());

        $puskas = $puskas->fresh(); // Check if OK even after refetching from DB
        $this->assertTrue(NameOrder::EASTERN()->equals($puskas->nameorder), 'Name order should be eastern');
        $this->assertEquals('Puskás Ferenc', $puskas->name());
    }

    /**
     * @test
     */
    public function nameorder_can_be_changed()
    {
        $soros = PersonProxy::create([
            'firstname' => 'György',
            'lastname'  => 'Soros',
        ]);

        $soros->nameorder = NameOrder::EASTERN;
        $soros->save();

        $this->assertTrue(NameOrder::EASTERN()->equals($soros->nameorder));

        $soros->firstname = 'George';
        $soros->nameorder = NameOrder::WESTERN();
        $soros->save();

        $soros = $soros->fresh();

        $this->assertEquals('George', $soros->firstname);
        $this->assertEquals(NameOrder::WESTERN, $soros->nameorder->value());
    }

    /**
     * @test
     */
    public function gender_is_unknown_by_default()
    {
        $conchita = PersonProxy::create([
           'firstname' => 'Conchita',
           'lastname'  => 'Wurst'
        ]);

        $this->assertNull($conchita->gender->value());
        $this->assertTrue(Gender::UNKNOWN()->equals($conchita->gender));
    }

    /**
     * @test
     */
    public function gender_can_be_changed_by_enum_object()
    {
        $craigWood = PersonProxy::create([
            'firstname' => 'Robert Hardy',
            'lastname'  => 'Craig-Wood',
            'gender'    => Gender::MALE
        ]);

        $craigWood = $craigWood->fresh();

        $this->assertTrue(Gender::MALE()->equals($craigWood->gender));

        // Assume it's the 2008 coming out:

        $craigWood->firstname = 'Kate';
        $craigWood->gender = Gender::FEMALE();
        $craigWood->save();

        $this->assertEquals(GENDER::FEMALE, $craigWood->gender->value());
        $this->assertEquals('Kate', $craigWood->firstname);

        // Just dblcheck if data has really been persisted:
        $craigWood = $craigWood->fresh();
        $this->assertEquals(GENDER::FEMALE, $craigWood->gender->value());
        $this->assertEquals('Kate', $craigWood->firstname);
    }

    /**
     * @test
     */
    public function gender_can_be_changed_via_string()
    {
        $craigWood = PersonProxy::create([
            'firstname' => 'Robert Hardy',
            'lastname'  => 'Craig-Wood'
        ]);

        $craigWood->gender = 'm';
        $craigWood->save();

        $this->assertTrue(Gender::MALE()->equals($craigWood->gender));
    }

    /**
     * @test
     */
    public function all_fields_can_be_set()
    {
        $chesley = PersonProxy::create([
            'firstname' => 'Chesley',
            'lastname'  => 'Sullenberger',
            'email'     => 'chesley1549@aa.com',
            'phone'     => '(541) 754-3010',
            'birthdate' => '1951-01-15',
            'gender'    => Gender::MALE,
            'nin'       => '999-01-0001'
        ]);

        $chesley = $chesley->fresh();

        $this->assertEquals('Chesley', $chesley->firstname);
        $this->assertEquals('Sullenberger', $chesley->lastname);
        $this->assertEquals('chesley1549@aa.com', $chesley->email);
        $this->assertEquals('(541) 754-3010', $chesley->phone);

        $this->assertInstanceOf(\DateTime::class, $chesley->birthdate);
        $this->assertEquals('1951-01-15', $chesley->birthdate->format('Y-m-d'));

        $this->assertTrue(Gender::MALE()->equals($chesley->gender));

        $this->assertEquals('999-01-0001', $chesley->nin);
    }

}