<?php


namespace App\Models\Builder;


use App\Models\Member;
use DateTime;
use Exception;
use Gabia\LaravelDto\Exception\InvalidInstanceException;
use Gabia\LaravelDto\Mapper\Mapper;
use Illuminate\Support\Collection;
use ReflectionClass;

class MemberBuilder
{
    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $insurance;

    /**
     * @var string
     */
    private $income;

    /**
     * @var string
     */
    private $loan_amount;

    /**
     * @var string
     */
    private $overdue;

    /**
     * @return Member
     */
    public function build(): Member
    {
        $data = $this->dtoToArray($this);

        $member = new Member();
        $member->fill($data);

        return $member;
    }

    private function dtoToArray($dto)
    {
        if (is_array($dto)) {
            $array = [];

            foreach ($dto as $key => $value) {
                $array[$key] = $this->dtoToArray($value);
            }

            return $array;
        } else if ($dto instanceof DateTime) {
            $date_time = $dto;
            return $date_time->format('Y-m-d H:i:s');
        } else if ($dto instanceof Collection) {
            return $dto->toArray();
        } else if (is_object($dto)) {
            return $this->objectToArray($dto);
        } else {
            return $dto;
        }
    }

    /**
     * @param $dto_instance
     * @return array
     * @throws InvalidInstanceException
     * @throws Exception
     */
    private function objectToArray($dto_instance): array
    {
        try {
            $reflection_class = new ReflectionClass($dto_instance);

            $array = [];
            $properties = $reflection_class->getProperties();
            foreach ($properties as $property) {
                $property->setAccessible(true);

                $value = $property->getValue($dto_instance);

                $array[$property->name] = $this->dtoToArray($value);
            }

            return $array;
        } catch (Exception $e) {
            throw new Exception('This instance is an instance that does not support the reflection.');
        }
    }

    /**
     * @param string $role
     * @return MemberBuilder
     */
    public function setRole(string $role): MemberBuilder
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @param string $name
     * @return MemberBuilder
     */
    public function setName(string $name): MemberBuilder
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $phone
     * @return MemberBuilder
     */
    public function setPhone(string $phone): MemberBuilder
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string $insurance
     * @return MemberBuilder
     */
    public function setInsurance(string $insurance): MemberBuilder
    {
        $this->insurance = $insurance;
        return $this;
    }

    /**
     * @param string $income
     * @return MemberBuilder
     */
    public function setIncome(string $income): MemberBuilder
    {
        $this->income = $income;
        return $this;
    }

    /**
     * @param string $loan_amount
     * @return MemberBuilder
     */
    public function setLoanAmount(string $loan_amount): MemberBuilder
    {
        $this->loan_amount = $loan_amount;
        return $this;
    }

    /**
     * @param string $overdue
     * @return MemberBuilder
     */
    public function setOverdue(string $overdue): MemberBuilder
    {
        $this->overdue = $overdue;
        return $this;
    }



}
