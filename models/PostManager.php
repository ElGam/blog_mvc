<?php

/**
 *
 */
class PostManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getPosts(){
    return $this->getAll('posts', 'Post');
  }

  public function getPost($id){
      return $this->getOne('posts', 'Post', $id);
    }

    public function getAllPostsByUserId($id){
      return $this->getAllByUser($id);
    }
    
    public function newComm($auteur, $post_id, $contenu, $date, $auteur_id, $status){
      return $this->newPostComm($auteur, $post_id, $contenu, $date, $auteur_id, $status);
    }

}



 ?>
