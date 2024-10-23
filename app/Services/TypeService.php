<?php

namespace App\Services;
use App\Models\Type;
class TypeService {

    public static function getClientTypes()
    {
        return Type::where('type_category' , 'client')->get();
    }
    public static function getPurchaseTypes()
    {
        return Type::where('type_category' , 'purchase')->get();
    }
    public static function getExpenseTypes()
    {
        return Type::where('type_category' , 'expense')->get();
    }

}
