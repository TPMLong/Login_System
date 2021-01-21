<!-- 

    class ViewProfile extends UserDAO{
        public function showProfile(){
            $datas = $this->getUserProfile(2);
            foreach($datas as $data){
                
                echo '<td><input  type="text" value="' . $data["userPhone"] . '" ></td>';
            }
        }

    } -->