<?php
  namespace WriterBlog\Entity;

	/**
	 * 
	 */
	class Comment 
	{

		private  $id;
		private  $autor;
		private  $id_post;
		private  $comment_text;
		private  $comment_date;
		private  $moderation;

    public function __construct (array $data)
    {
      $this->hydrate($data);
    }

		public function id() { return $this->id;}
		public function autor() { return $this->autor;}
		public function id_post() { return $this->id_post;}
		public function comment_text() { return $this->comment_text;}
		public function comment_date() { return $this->comment_date;}
		public function moderation() { return $this->moderation;}

    public function hydrate(array $data)
    {
      foreach ($data as $key => $value)
      {
        $method = 'set'.ucfirst($key);           
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

  		public function setId($id) 
  		{
  			$id = (int) $id;
    		if ($id > 0)
   			{
      			$this->id = $id;
    		}  
    	}

    	public function setAutor($autor)
  		{
    		if (is_string($autor))
    		{
      			$this->autor = $autor;
    		}
  		}  

    	public function setId_post($id_post)
  		{
        $id_post = (int) $id_post;
        if ($id_post > 0)
        {
            $this->id_post = $id_post;
        }  
  		} 

    	public function setComment_text($comment_text)
  		{
    		if (is_string($comment_text))
    		{
      			$this->comment_text = $comment_text;
    		}
  		}

    	public function setComment_date($comment_date)
  		{
    		if (is_string($comment_date))
    		{
      			$this->comment_date = $comment_date;
    		}
  		}

    	public function setModeration($moderation)
  		{
    		if (is_string($moderation))
    		{
      			$this->moderation = $moderation;
    		}
  		}   		    		  				  		  		
	}