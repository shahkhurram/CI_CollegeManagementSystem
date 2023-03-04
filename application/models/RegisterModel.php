<?php
class RegisterModel extends CI_Model
{
   public function registerRoles()
   {
      $roles = $this->db->get('roles');
      if ($roles->num_rows() > 0) {
         return $roles->result();
      }
   }
   public function registerCollege()
   {
      $colleges = $this->db->get('college');
      if ($colleges->num_rows() > 0) {
         return $colleges->result();
      }
   }
   public function registerCoadmin($data)
   {
      $this->db->insert('users', $data);
      return true;
   }
   public function insert($data)
   {
      $this->db->insert('users', $data);
      return true;
   }
   public function insertStudent($data)
   {
      $this->db->insert('students', $data);
      return true;
   }
   public function getStudents($college_id)
   {
      $this->db->select(['students.id', 'college.college_name', 'students.student_name', 'students.email', 'students.gender', 'students.course']);
      $this->db->from('students');
      $this->db->join('college', 'college.college_id = students.college_id');
      $this->db->where(['students.college_id' => $college_id]);
      $students = $this->db->get();
      return $students->result();
   }
   public function getStudentrecord($id)
   {
      $this->db->select(['students.id', 'students.college_id', 'college.college_name', 'students.student_name', 'students.email', 'students.gender', 'students.course']);
      $this->db->from('students');
      $this->db->join('college', 'college.college_id = students.college_id');
      $this->db->where(['students.id' => $id]);
      $student = $this->db->get();
      return $student->row();
   }
   public function updateStudent($data, $id)
   {
      return $this->db->where('id', $id)
         ->update('students', $data);
   }
   public function removeStudent($id)
   {
      return $this->db->delete('students', ['id' => $id]);
   }
   public function checkAdminExist()
   {
      $checkadmin = $this->db->where(['role_id' => '1'])
         ->get('users');
      if ($checkadmin->num_rows() > 0) {
         return $checkadmin->num_rows();
      } else {
         return '0';
      }
   }
   public function makeCollege($data)
   {
      return $this->db->insert('college', $data);
   }
   public function viewAllColleges()
   {
      $this->db->select(['users.id', 'college.college_name', 'college.college_id', 'users.name', 'users.email', 'roles.role_name', 'users.gender', 'college.branch']);
      $this->db->from('college');
      $this->db->join('users', 'users.college_id = college.college_id');
      $this->db->join('roles', 'roles.role_id = users.role_id');
      $users = $this->db->get();
      return $users->result();
   }
}
?>