<?php
    include '../auth/app.php';
    include '../auth/auth.php';

    error_reporting(0);
    if (isset($_POST['agent'])) {
        
        $poll_id = htmlspecialchars($crud->db->real_escape_string($_POST['poll_id']));
        $firstname = htmlspecialchars($crud->db->real_escape_string($_POST['firstname']));
        $lastname = htmlspecialchars($crud->db->real_escape_string($_POST['lastname']));
        $email = htmlspecialchars($crud->db->real_escape_string( $_POST['email']));
        $phone = htmlspecialchars($crud->db->real_escape_string($_POST['phone']));
       
       $table = 'agentname';
       $fields = array(
           "firstname" => $firstname,
           "lastname" => $lastname,
           "email" => $email,
           "phone" => $phone,
           "pollingunit_uniqueid" => $poll_id,
       );
       
        $query_data = $crud->create_data($table, $fields);

        if ($query_data)
        {
            redirect( 'Agent added Successful','../agent.php?poll='.$poll_id,'success');
        } else {
                redirect( 'Agent not Added','../agent.php?poll='.$poll_id,'warning');
            }   
    }

// -----------------------------------------------------------------------------------------------------------
// Delete Advert

if (isset($_GET['delete'])) {

    $id = $crud->db->real_escape_string($_GET['delete']);
    $table = 'agentname'; 
    $where = array(
            "name_id" => $id
        );  

    $delete = $crud->del($table, $where);

    if($delete)
    {
        redirect( 'Agent Deleted Successful','../poll_unit.php','success');
    } else {
            redirect( 'Agent not Deleted','../poll_unit.php','warning');
        } 
                
    }

    // ====================================================================================================
    if (isset($_POST['search'])) {
        
        $search = htmlspecialchars($crud->db->real_escape_string($_POST['poll_id']));
        $name = $auth->getName($search);
        $getcount = $auth->getTableCountUser($search);
        redirect( '','../index.php?search='.$getcount.'&name='.$name,'');

    }
?>