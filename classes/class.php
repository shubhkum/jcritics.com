<?php 
include('../include/db.php'); 
/**
 * 
 */
class Main
{
	public function pro_india_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_india(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_india($journalist_id);
	}
	public function pro_india_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_india WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_india($journalist_id);
	}
	public function addNum_pro_india($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_india=pro_india+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_india($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_india=pro_india-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function add_rating($user_id,$journalist_id,$points){
		global $con;
		$query="UPDATE journalists SET total_points=total_points+'$points' WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
		$query="UPDATE journalists SET total_ppl_rated=total_ppl_rated+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
		$this->add_in_rating_table($user_id,$journalist_id,$points);
		$this->recal_rating($journalist_id);

	}
	public function add_in_rating_table($user_id,$journalist_id,$points){
		global $con;
		$query="INSERT INTO rating(sender,receiver,rating_score) VALUES('$user_id','$journalist_id','$points')";
		$execute=mysqli_query($con,$query);
	}
	public function recal_rating($journalist_id){
		global $con;
		$query="UPDATE journalists SET rating= FORMAT((total_points/total_ppl_rated),1) WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function update_rating($user_id,$journalist_id,$points,$curr_rating){
		global $con;
		$query="UPDATE journalists SET total_points=total_points+'$points'-'$curr_rating' WHERE id='$journalist_id'";
		mysqli_query($con,$query);
		$this->update_in_rating_table($user_id,$journalist_id,$points);
		$this->recal_rating($journalist_id);
	}
	public function update_in_rating_table($user_id,$journalist_id,$points){
		global $con;
		$query="UPDATE rating SET rating_score='$points' WHERE sender='$user_id' AND receiver='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function anti_india_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO anti_india(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_anti_india($journalist_id);
	}
	public function anti_india_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM anti_india WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_anti_india($journalist_id);
	}
	public function addNum_anti_india($journalist_id){
		global $con;
		$query="UPDATE journalists SET anti_india=anti_india+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_anti_india($journalist_id){
		global $con;
		$query="UPDATE journalists SET anti_india=anti_india-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}

	public function pro_bjp_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_bjp(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_bjp($journalist_id);
	}
	public function pro_bjp_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_bjp WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_bjp($journalist_id);
	}
	public function addNum_pro_bjp($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_bjp=pro_bjp+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_bjp($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_bjp=pro_bjp-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function pro_cong_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_cong(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_cong($journalist_id);
	}
	public function pro_cong_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_cong WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_cong($journalist_id);
	}
	public function addNum_pro_cong($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_congress=pro_congress+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_cong($journalist_id){
		global $con;
		$query="UPDATE journalists SET pro_congress=pro_congress-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function leftist_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO leftist(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_leftist($journalist_id);
	}
	public function leftist_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM leftist WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_leftist($journalist_id);
	}
	public function addNum_leftist($journalist_id){
		global $con;
		$query="UPDATE journalists SET leftist=leftist+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_leftist($journalist_id){
		global $con;
		$query="UPDATE journalists SET leftist=leftist-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function rightist_tagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO rightist(sender,receiver) VALUES ('$user_id','$journalist_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_rightist($journalist_id);
	}
	public function rightist_untagged($user_id,$journalist_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM rightist WHERE sender='$user_id' AND receiver='$journalist_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_rightist($journalist_id);
	}
	public function addNum_rightist($journalist_id){
		global $con;
		$query="UPDATE journalists SET rightist=rightist+1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_rightist($journalist_id){
		global $con;
		$query="UPDATE journalists SET rightist=rightist-1 WHERE id='$journalist_id'";
		$execute=mysqli_query($con,$query);
	}


}


 ?>