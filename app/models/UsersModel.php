<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 * 
 * Automatically generated via CLI.
 */
class UsersModel extends Model {
    protected $table = 'info';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

      public function page($q = '', $records_per_page = null, $page = null) {
 
            if (is_null($page)) {
                return $this->db->table('info')->get_all();
            } else {
                $query = $this->db->table('info');

                // Build LIKE conditions
                $query->like('id', '%'.$q.'%')
                ->or_like('lastname', '%'.$q.'%')
                ->or_like('firstname', '%'.$q.'%')
                ->or_like('email', '%'.$q.'%');

                    
                // Clone before pagination
                $countQuery = clone $query;

                $data['total_rows'] = $countQuery->select_count('*', 'count')
                                                ->get()['count'];

                $data['records'] = $query->pagination($records_per_page, $page)
                                        ->get_all();

                return $data;
            }
        }

        public function get_user_by_username($username)
        {
            return $this->db->table($this->table)
                            ->where('username', $username)
                            ->get()
                            ->row_array();
        }
    
        public function get_user_by_id($id)
        {
            return $this->db->table($this->table)
                            ->where('id', $id)
                            ->get()
                            ->row_array();
        }
    
        public function insert($data)
        {
            return $this->db->table($this->table)->insert($data);
        }
    
        public function update($id, $data)
        {
            return $this->db->table($this->table)
                            ->where('id', $id)
                            ->update($data);
        }
    
        public function delete($id)
        {
            return $this->db->table($this->table)
                            ->where('id', $id)
                            ->delete();
        }

}