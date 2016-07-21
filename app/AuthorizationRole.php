<?php
/**
 * Author: Archie, Disono (webmonsph@gmail.com)
 * Website: http://www.webmons.com
 * License: Apache 2.0
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthorizationRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'authorization_id'
    ];
    
    private static $params;
    
    /**
     * Get data
     *
     * @param array $params
     * @return null
     */
    public static function get($params = [])
    {
        $select[] = 'authorization_roles.*';
        $select[] = DB::raw('authorizations.name as authorization_name, authorizations.identifier as authorization_identifier, ' .
            'authorizations.description as authorization_description');
        
        $select[] = DB::raw('roles.name as role_name, roles.slug as role_slug, roles.description as role_description');
        
        $query = self::select($select)
            ->join('authorizations', 'authorization_roles.authorization_id', '=', 'authorizations.id')
            ->join('roles', 'authorization_roles.role_id', '=', 'roles.id');
        
        if (isset($params['id'])) {
            $query->where('authorization_roles.id', $params['id']);
        }
        
        if (isset($params['identifier'])) {
            $query->where('authorizations.identifier', $params['identifier']);
        }
        
        if (isset($params['role_id'])) {
            $query->where('authorization_roles.role_id', $params['role_id']);
        }
        
        if (isset($params['authorization_id'])) {
            $query->where('authorization_roles.authorization_id', $params['authorization_id']);
        }
        
        if (isset($params['search'])) {
            self::$params = $params;
            $query->Where(function ($query) {
                $query->where('authorizations.name', 'LIKE', '%' . self::$params['search'] . '%')
                    ->orWhere('authorizations.identifier', 'LIKE', '%' . self::$params['search'] . '%')
                    ->orWhere('authorizations.description', 'LIKE', '%' . self::$params['search'] . '%')
                    ->orWhere('roles.name', 'LIKE', '%' . self::$params['search'] . '%')
                    ->orWhere('roles.slug', 'LIKE', '%' . self::$params['search'] . '%')
                    ->orWhere('roles.description', 'LIKE', '%' . self::$params['search'] . '%');
            });
        }
        if (isset($params['object'])) {
            return $query;
        } else {
            if (isset($params['single'])) {
                return self::_format($query->first(), $params);
            } else if (isset($params['all'])) {
                return self::_format($query->get(), $params);
            } else {
                $query = paginate($query);

                return self::_format($query, $params);
            }
        }
    }
    
    /**
     * Get single data
     *
     * @param $id
     * @param string $column
     * @return null
     */
    public static function single($id, $column = 'id')
    {
        if (!$id) {
            return null;
        }
        
        return self::get([
            'single' => true,
            $column => $id
        ]);
    }
    
    /**
     * Get all data
     *
     * @return null
     */
    public static function getAll()
    {
        return self::get([
            'all' => true
        ]);
    }
    
    /**
     * Store new data
     *
     * @param array $inputs
     * @return bool
     */
    public static function store($inputs = [])
    {
        $store = [];
        $columns = [
            'role_id', 'authorization_id'
        ];
        
        foreach ($inputs as $key => $value) {
            if (in_array($key, $columns)) {
                $store[$key] = $value;
            }
        }
        
        $store['created_at'] = sql_date();
        return (int)self::insertGetId($store);
    }
    
    /**
     * Delete data
     *
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public static function remove($id)
    {
        return (bool)self::destroy($id);
    }
    
    /**
     * Update data
     *
     * @param $id
     * @param array $inputs
     * @param null $column_name
     * @return bool
     */
    public static function edit($id, $inputs = [], $column_name = null)
    {
        $update = [];
        $query = null;
        $columns = [
            'role_id', 'authorization_id'
        ];
        
        if (!$column_name) {
            $column_name = 'id';
        }
        
        if ($id && !is_array($column_name)) {
            $query = AuthorizationRole::where($column_name, $id);
        } else {
            $i = 0;
            
            foreach ($column_name as $key => $value) {
                if (!in_array($key, $columns)) {
                    return false;
                }
                
                if (!$i) {
                    $query = AuthorizationRole::where($key, $value);
                } else {
                    if ($query) {
                        $query->where($key, $value);
                    }
                }
                
                $i++;
            }
        }
        
        foreach ($inputs as $key => $value) {
            if (in_array($key, $columns)) {
                $update[$key] = $value;
            }
        }
        return (bool)$query->update($update);
    }
    
    /**
     * Add formatting on data
     *
     * @param $query
     * @param array $params
     * @return null
     */
    private static function _format($query, $params = [])
    {
        if (isset($params['single'])) {
            if (!$query) {
                return null;
            }
        } else {
            foreach ($query as $row) {
                
            }
        }
        return $query;
    }
}