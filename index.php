<?php

		class Node
		{
			public $data;
			public $next;

			function __construct($data)
			{
				$this->data = $data;
				$this->next = NULL;
			}

			function readNode()
			{
				return $this->data;
			}
		}

		class LinkedList
		{
			private $firstNode;
			private $lastNode;

			function __construct()
			{
				$this->firstNode = NULL;
				$this->lastNode = NULL;
			}

			function isEmpty()
			{
			    return ($this->firstNode == NULL);
			}

			function insertAtBeginning($data)
			{
				$newNode = new Node($data);
				if($this->firstNode==NULL)
				{
					$this->firstNode = &$newNode;
					$this->lastNode = &$newNode;
				}
				else
				{
					$newNode->next = $this->firstNode;
					$this->firstNode = &$newNode;
				}
			}

			function insertAtLast($data)
			{
				$newNode = new Node($data);
				if($this->lastNode==NULL)
				{
					$this->firstNode = &$newNode;
					$this->lastNode = &$newNode;
				}
				else
				{
					$this->lastNode->next = $newNode;
					$this->lastNode = &$newNode;
				}
			}

			function deleteFirstNode()
			{
				if(!$this->isEmpty())
				{
					if($this->firstNode == $this->lastNode)
					{
						$this->firsttNode = NULL;
						$this->lastNode = NULL;
					}
					else
					{
						$this->firstNode = $this->firstNode->next;
					}
				}
				else
				{
					echo "List is empty<br>";
				}
			}

			function deleteLastNode()
			{
				if($this->lastNode!=NULL)
				{
					if($this->firstNode == $this->lastNode)
					{
						$this->firstNode = NULL;
						$this->lastNode = NULL;
					}
					else
					{
						for($i = $this->firstNode;$i->next!=$this->lastNode;$i=$i->next);
						$i->next = NULL;
						$this->lastNode = &$i;
					}
				}
				else
				{
					echo "List is empty<br>";
				}
			}

			function deleteNode($data)
			{
				if($this->firstNode!=NULL)
				{
					if($this->firstNode == $this->lastNode)
					{
						$this->firstNode = NULL;
						$this->lastNode = NULL;
					}
					else
					{
						for($i = $this->firstNode;$i!=NULL;$i=$i->next)
						{
							if($i->data==$data && $i == $this->firstNode)
							{
								$this->deleteFirstNode();
								break;
							}
							else if($i->data==$data && $i == $this->lastNode)
							{
								$this->deleteLastNode();
								break;
							}
							else if($i->next->data==$data)
							{
								$i->next = $i->next->next;
								break;
							}
						}
					}
				}
				else
				{
					echo "List is empty<br>";
				}
			}

			function printList()
			{
				if($this->firstNode!=NULL)
				{
					for($i = $this->firstNode;$i!=NULL;$i=$i->next)
					{
						echo $i->data." -> ";
					}
				}
				else
				{
					echo "List is empty";
				}
				echo "<br>";
			}
		}

		$obj = new LinkedList();

		$obj->insertAtBeginning(10);
		$obj->insertAtBeginning(20);
		$obj->insertAtLast(30);
		$obj->insertAtLast(40);
		$obj->insertAtBeginning(50);
		$obj->insertAtLast(60);

		$obj->printList();

		$obj->deleteFirstNode();

		$obj->printList();

		$obj->deleteLastNode();

		$obj->printList();

		$obj->deleteNode(30);

		$obj->printList();

?>