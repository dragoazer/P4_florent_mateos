<?php
  namespace WriterBlog\Entity;

	/**
	 * 
	 */
	class Post 
	{

		private  $id;
		private  $title;
		private  $content;
		private  $creation_date;
		private  $autor;

    public function __construct (array $data)
    {
      $this->hydrate($data);
    }

		public function id() { return $this->id;}
		public function title() { return $this->title;}
		public function content() { return $this->content;}
		public function creation_date() { return $this->creation_date;}
		public function autor() { return $this->autor;}

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

    	public function setTitle($title)
  		{
    		if (is_string($title))
    		{
      			$this->title = $title;
    		}
  		}  

    	public function setContent($content)
  		{
    		if (is_string($content))
    		{
      			$this->content = $content;
    		}
  		} 

    	public function setCreation_date($creation_date)
  		{
    		if (is_string($creation_date))
    		{
      			$this->creation_date = $creation_date;
    		}
  		}

    	public function setAutor($autor)
  		{
    		if (is_string($autor))
    		{
      			$this->autor = $autor;
    		}
  		} 		    		  				  		  		
	}