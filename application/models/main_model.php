<?php

class main_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function create_user()
    {
        $this->load->helper('url');
        $username = $this->input->post('user_name');
        $input_username = htmlspecialchars($username);
        $city = $this->input->post('city');
        $phone = $this->input->post('phone_namber');
        $newPhone = preg_replace("/[^0-9A-Za-z]/", "", $phone);
        $data = array(
            'id_city' => $city,
            'phone' => $newPhone,
            'username' => $input_username,
        );

        return $this->db->insert('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->delete('users', array('id' => $id));
    }

    public function show_user()
    {
        $this->db->select('users.id, users.username, users.phone, city.city_name');
        $this->db->from('users');
        $this->db->join('city', 'city.id = users.id_city');
        $this->db->order_by("username", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_user($id)
    {
        $query = $this->db->get_where('users',array('id'=> $id));
        $data['user_id']= array('');
        $data['user_id'] = $query->result_array();
        return $this->output->json($data);
    }

    public function update_user(){
        $newName = $_POST['nameEdit'];
        $newPhone= $_POST['phoneEdit'];
        $userId = $_POST['userId'];
        var_dump($userId);
        $data = array(
            'username' => $newName,
            'phone' => $newPhone,
        );
        return $this->db->update('users', $data, array('id' => $userId));

    }

    public function get_city()
    {
        $query = $this->db->get('city');
        return $query->result_array();
    }
}
