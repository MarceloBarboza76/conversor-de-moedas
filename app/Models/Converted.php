<?php


namespace App\Models;

/**
 * Description of Converted
 *
 * @author Marcelo Barboza
 */


use Illuminate\Database\Eloquent\Model;

class Converted extends Model
{
    
    protected $table = 'converted';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_converted';
    
    const CREATED_AT = 'date_add';
    const UPDATED_AT = 'date_update';
    
}
