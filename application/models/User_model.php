<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $data = [];
    public function getUser()
    {
        $email = $this->session->userdata('email');
        return $this->data = $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function editProfile()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        var_dump($_FILES);
        die;

        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './asset/img/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $this->data['image'];
                if ($old_image != 'male.jpg' && $old_image != 'female.jpeg') {
                    unlink(FCPATH . '/property/img/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('user/edit');
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('users');
    }

    public function changePassword()
    {
        $current_password = htmlspecialchars($this->input->post('current_password', true));
        $new_password = htmlspecialchars($this->input->post('new_password1', true));

        if (!password_verify($current_password, $this->data['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Current Password is wrong!</div>');
            redirect('user/changepassword');
        } else {
            if ($new_password == $current_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password does not be the same as current password!</div>');
                redirect('user/changepassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->data['email']);
                $this->db->update('users');
            }
        }
    }

    public function getAddress()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('user_address', ['email' => $email])->result_array();
    }

    public function getAddressById($id)
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('user_address', ['id' => $id, 'email' => $email])->row_array();
    }

    public function getAddressByDes()
    {
        $des = "First Address";
        $email = $this->session->userdata('email');
        return $this->db->get_where('user_address', ['email' => $email, 'description' => $des])->row_array();
    }


    public function addAddress()
    {
        $email = $this->input->post('email');
        $name = htmlspecialchars($this->input->post('name', true));
        $street_name = htmlspecialchars($this->input->post('street_name', true));
        $id_province = htmlspecialchars($this->input->post('id_province', true));
        $province = htmlspecialchars($this->input->post('province', true));
        $id_city = htmlspecialchars($this->input->post('id_city', true));
        $city_name = htmlspecialchars($this->input->post('city_name', true));
        $sub_district = htmlspecialchars($this->input->post('sub_district', true));
        $urban_village = htmlspecialchars($this->input->post('urban_village', true));
        $no_hp = htmlspecialchars($this->input->post('no_hp', true));
        $label = htmlspecialchars($this->input->post('label', true));
        $description = htmlspecialchars($this->input->post('description', true));

        $data = [
            'email' => $email,
            'name' => $name,
            'street_name' => $street_name,
            'id_province' => $id_province,
            'province' => $province,
            'id_city' => $id_city,
            'city_name' => $city_name,
            'sub_district' => $sub_district,
            'urban_village' => $urban_village,
            'no_hp' => $no_hp,
            'label' => $label,
            'description' => $description
        ];

        $this->db->insert('user_address', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            echo "error";
            die;
        }
    }

    public function delAddress($id)
    {
        $email = $this->session->userdata('email');
        $this->db->delete('user_address', ['id' => $id, 'email' => $email]);
        if ($this->db->affected_rows() < 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Address cannot delete!</div>');
            redirect('user/address');
        }
    }

    public function editAddress()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        if (!$id) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Address cannot edit!</div>');
            redirect('user/address');
        }
        $name = htmlspecialchars($this->input->post('name', true));
        $street_name = htmlspecialchars($this->input->post('street_name', true));
        $id_province = htmlspecialchars($this->input->post('id_province', true));
        $province = htmlspecialchars($this->input->post('province', true));
        $id_city = htmlspecialchars($this->input->post('id_city', true));
        $city_name = htmlspecialchars($this->input->post('city_name', true));
        $sub_district = htmlspecialchars($this->input->post('sub_district', true));
        $urban_village = htmlspecialchars($this->input->post('urban_village', true));
        $no_hp = htmlspecialchars($this->input->post('no_hp', true));
        $label = htmlspecialchars($this->input->post('label', true));
        $description = htmlspecialchars($this->input->post('description', true));

        if (!$id_city) {
            $data = [
                'name' => $name,
                'street_name' => $street_name,
                'id_province' => $id_province,
                'province' => $province,
                'city_name' => $city_name,
                'sub_district' => $sub_district,
                'urban_village' => $urban_village,
                'no_hp' => $no_hp,
                'label' => $label,
                'description' => $description
            ];
        } else {
            $data = [
                'name' => $name,
                'street_name' => $street_name,
                'id_province' => $id_province,
                'province' => $province,
                'id_city' => $id_city,
                'city_name' => $city_name,
                'sub_district' => $sub_district,
                'urban_village' => $urban_village,
                'no_hp' => $no_hp,
                'label' => $label,
                'description' => $description
            ];
        }

        $this->db->where('id', $id);
        $this->db->update('user_address', $data);
    }

    public function item()
    {
        return $this->db->get('user_shop')->result_array();
    }

    public function getItemById($id)
    {
        return $this->db->get_where('user_shop', ['id' => $id])->row_array();
    }

    public function getMessage()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('user_message', ['id_receiver' => $id])->result_array();
    }

    public function getApiRajaOngkirProvince()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 6b3fe3444c5000359e251ea4a49645f7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getApiRajaOngkirCity($idprov = '')
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $idprov,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 6b3fe3444c5000359e251ea4a49645f7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getApiRajaOngkirCost()
    {
        $origin = $this->input->post('origin');
        $des = $this->input->post('des');
        $courier = $this->input->post('courier');
        $weight = $this->input->post('weight_item');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 6b3fe3444c5000359e251ea4a49645f7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
}
