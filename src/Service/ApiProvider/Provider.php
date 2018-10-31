<?php
namespace App\Service\ApiProvider;

class Provider
{
    private static $list = [
        1 => 'github',
        2 => 'twitter',
    ];

    public static function get(string $name) : array
    {
        switch ($name) {
            case 'github':
                $class = new Github\SearchIssues();
                break;

            case 'twitter':
                throw new \Exception('Not implemented');
                break;

            default:
                throw new \Exception('Not implemented');
        }

        return [
            /*'class' =>*/
            $class,
            /*'id' =>*/
            array_search($name, self::$list),
        ];
    }
}