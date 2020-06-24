<?php
/**
 *
 */
class CommentaireManager extends Model
{
    
  public function newComm($auteur, $post_id, $contenu, $date, $auteur_id, $status){
      return $this->newPostComm($auteur, $post_id, $contenu, $date, $auteur_id, $status);
    }
    
    public function getComm($id){
      return $this->getCommentaires($id);
    }
}
 ?>