<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/field_mask_error.proto

namespace Google\Ads\GoogleAds\V9\Errors\FieldMaskErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible field mask errors.
 *
 * Protobuf type <code>google.ads.googleads.v9.errors.FieldMaskErrorEnum.FieldMaskError</code>
 */
class FieldMaskError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The field mask must be provided for update operations.
     *
     * Generated from protobuf enum <code>FIELD_MASK_MISSING = 5;</code>
     */
    const FIELD_MASK_MISSING = 5;
    /**
     * The field mask must be empty for create and remove operations.
     *
     * Generated from protobuf enum <code>FIELD_MASK_NOT_ALLOWED = 4;</code>
     */
    const FIELD_MASK_NOT_ALLOWED = 4;
    /**
     * The field mask contained an invalid field.
     *
     * Generated from protobuf enum <code>FIELD_NOT_FOUND = 2;</code>
     */
    const FIELD_NOT_FOUND = 2;
    /**
     * The field mask updated a field with subfields. Fields with subfields may
     * be cleared, but not updated. To fix this, the field mask should select
     * all the subfields of the invalid field.
     *
     * Generated from protobuf enum <code>FIELD_HAS_SUBFIELDS = 3;</code>
     */
    const FIELD_HAS_SUBFIELDS = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::FIELD_MASK_MISSING => 'FIELD_MASK_MISSING',
        self::FIELD_MASK_NOT_ALLOWED => 'FIELD_MASK_NOT_ALLOWED',
        self::FIELD_NOT_FOUND => 'FIELD_NOT_FOUND',
        self::FIELD_HAS_SUBFIELDS => 'FIELD_HAS_SUBFIELDS',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FieldMaskError::class, \Google\Ads\GoogleAds\V9\Errors\FieldMaskErrorEnum_FieldMaskError::class);

