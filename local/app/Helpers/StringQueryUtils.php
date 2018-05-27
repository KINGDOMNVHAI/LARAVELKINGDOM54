<?php
namespace App\Helpers;

class StringQueryUtils
{
    /**
     * Add query where like if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function whereILikeIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->where($fieldName, 'ilike', '%' . $fieldValue . '%');
        }
        return $query;
    }
    /**
     * Add query where equal if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function whereEqualIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->where($fieldName, $fieldValue);
        }
        return $query;
    }

    /**
     * Add query where less than if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function whereLessThanIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->where($fieldName, '<=', $fieldValue);
        }
        return $query;
    }

    /**
     * Add query where more than if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function whereMoreThanIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->where($fieldName, '>=', $fieldValue);
        }
        return $query;
    }

    /**
     * Add query or where equal if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function orWhereEqualIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->orWhere($fieldName, $fieldValue);
        }
        return $query;
    }

    /**
     * Add query or where less than if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function orWhereLessThanIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->orWhere($fieldName, '<=', $fieldValue);
        }
        return $query;
    }

    /**
     * Add query or where more than if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function orWhereMoreThanIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->orWhere($fieldName, '>=', $fieldValue);
        }
        return $query;
    }

    /**
     * Add query where between if not empty to builder.
     *
     * @param $query
     * @param $fromFieldName
     * @param $toFieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function whereBetweenIfNotEmpty($query, $fromFieldName, $toFieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->where($fromFieldName, '<=', $fieldValue)->where($toFieldName, '>=', $fieldValue);
        }
        return $query;
    }

    /**
     * Add query or where ilike if not empty to builder.
     *
     * @param $query
     * @param $fieldName
     * @param $fieldValue
     *
     * @return QueryBuilder
     */
    public static function orWhereILikeIfNotEmpty($query, $fieldName, $fieldValue)
    {
        if (StringUtils::isNotEmpty($fieldValue)) {
            $query = $query->orWhere($fieldName, 'ilike', '%' . $fieldValue . '%');
        }
        return $query;
    }
}
