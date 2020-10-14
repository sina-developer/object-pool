<?php

namespace Pool;

use Pool\PoolObject;

class Pool{

    private static $_available = [];
    private static $_inUse = [];

    public static function getObject(){
        if(sizeof(self::$_available)){
            $obj = self::$_available[0];
            self::$_inUse[] = $obj;
            unset(self::$_available[0]);
            self::$_available = array_values(self::$_available);
            return $obj;
        }else{
            $obj = new PoolObject();
            self::$_inUse[] = $obj;
            return $obj;
        }
    }

    public static function releaseObject(PoolObject $obj){
        self::cleanObj($obj);
        self::$_available [] = $obj;
        self::$_inUse = array_filter(self::$_inUse , function($_obj) use ($obj){
            return $_obj->getCreatedAt() != $obj->getCreatedAt();
        });
    }

    private static function cleanObj(PoolObject $obj){
        $obj->setData(null);
    }

    public static function getDataCounts(){// Just for log!
        return ["_available" => sizeof(self::$_available) ,"_inUse" =>  sizeof(self::$_inUse)];
    }
}