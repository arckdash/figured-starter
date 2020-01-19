<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\User;

abstract class BaseService
{
    /**
     * @var string $methodName
     */
    private $methodName = 'execute';

    /**
     * @var string $nextCallable
     */
    private $nextCallable = 'processData';

    /**
     * @var User $user
     */
    protected $user;

    /**
     * Contains the logic the service should execute.
     *
     * @param array $data
     * @param array $middleware
     * @return mixed
     */
    public function execute(array $data = [], array $middleware = [])
    {
        // 1) First resolve middleware
        $this->resolveMiddleware($middleware, $data);
        // 2) Process/Execute business logic
        return $this->processData($data);
    }

    /**
     * Resolve the middleware stack from the laravel container.
     *
     * @param array $middleware
     * @param array $data
     */
    protected function resolveMiddleware(array $middleware, array $data): void
    {
        foreach ($middleware as $key => $class) {
            $validatorMiddleware = app($class);
            // checking if the validator middleware has an implementation for the function: 'execute' stored in $this->methodName
            if (is_callable([$validatorMiddleware, $this->methodName])) {
                $callable = null;
                // checking if the validator middleware to process now is the last one before the service be called.
                if ($key === array_key_last($middleware)) {
                    $callable = [$this, $this->nextCallable];
                }
                $validatorMiddleware->{$this->methodName}($data, $callable);
            }
        }
    }

    /**
     * This function process the business rules for a given service.
     *
     * @param array $data
     *
     * @return mixed
     */
    abstract protected function processData(array $data);

//    /**
//     * Process data, to meet the business logic/rules required.
//     *
//     * @param array $details
//     * @param string $prefix
//     * @return array
//     */
//    protected function getFlattenedDetails(array $details, string $prefix): array
//    {
//        $flatDetails = [];
//
//        foreach ($details as $key => $value) {
//            if(is_array($value)) {
//                $flatDetails[] = $this->getFlattenedDetails($value, $prefix . ucfirst($key));
//                continue;
//            }
//
//            $flatDetails[$prefix . ucfirst($key)] = (string)$value;
//        }
//        $flatDetails = array_merge([], ...$flatDetails);
//
//        return $flatDetails;
//    }
}
