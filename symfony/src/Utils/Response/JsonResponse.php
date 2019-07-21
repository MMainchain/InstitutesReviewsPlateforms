<?php

namespace App\Utils\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Json response handling headers and serialization without circular references
 */
class JsonResponse extends Response
{

    const JSON_FORMAT = 'json';
    const CIRCULAR_REFERENCE_HANDLER = 'circular_reference_handler';
    const CONTENT_TYPE_HEADER_KEY = 'Content-Type';
    const APPLICATION_JSON_HEADER_VALUE = 'application/json';


    public function __construct($entity)
    {
        parent::__construct();

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        
        $serializedEntity = $serializer->serialize($entity, self::JSON_FORMAT, [
            self::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getId();
            }
        ]);

        $this->setContent($serializedEntity);
        $this->headers->set(self::CONTENT_TYPE_HEADER_KEY, self::APPLICATION_JSON_HEADER_VALUE);
    }
}