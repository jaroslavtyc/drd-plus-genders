<?php
namespace Drd\Genders\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrineum\Scalar\ScalarEnumType;
use Drd\Genders\Gender;

/**
 * @method static GenderType getType(string $name),
 * @see ScalarEnumType::getType for parent
 *
 * @method Gender convertToPHPValue(string $value, AbstractPlatform $platform)
 * @see ScalarEnumType::convertToPHPValue for parent
 */
class GenderType extends ScalarEnumType
{
    const GENDER = 'gender';

    /**
     * @param Gender $gender
     * @return bool
     */
    public static function registerGenderAsSubType(Gender $gender)
    {
        if (static::hasSubTypeEnum(get_class($gender))) {
            return true;
        }

        return static::addSubTypeEnum(get_class($gender), "~^$gender$~");
    }
}
