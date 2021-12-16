<?php 

Class Tournament 
{

	private $nameT;

	private $date;

	private $DLL = '';

	private $last = NULL;

	public function __construct(string $nameT, string $date = '')
	{
		$this->nameT = $nameT;

		$this->DLL = new SplDoublyLinkedList();

		if(!empty($date))
		{
			$this->setDay($date);
		} 
		else 
		{
			$this->nextDay();
		}
	}

	public function addPlayer(Player $player) : object
	{
		$this->setLast($player);

		$this->DLL->push($player);

		return $this;
	}

	//Добавление игрока-заглушки
	protected function addEmpty() : void
	{
		$last = new Player("JohnDoe");

		$this->DLL->push($last);

		$this->setLast($last);
	}

	protected function setDay(string $date) : void
	{
		$this->date = date("d.m.Y", strtotime( str_replace('.', '-', $date)));
	}

	protected function nextDay() : void
	{
		if(!empty($this->date))
		{
			$this->date = date("d.m.Y", strtotime( str_replace('.', '-', $this->date) . ' +1 days'));
		}
		else
		{
			$this->date = date("d.m.Y", strtotime("tomorrow"));
		}
	}

	//индекс последнего добавленного игрока
	protected function setLast(Player $player) : void
	{
		$this->last = $player;
	}

	//Проверка, что на турнире есть игроки
	protected function checkTournament() : bool
	{
		if($this->DLL->count() == 0)
		{
			echo 'Турнир без игроков - попахивает отмыванием денег';
			return false;
		}
		else
		{
			return true;
		}
	}

	//Создание пар игроков на турнире и вывод на страницу
	public function createPairs()
	{
		if(!$this->checkTournament())
			return;

		$list = $this->DLL;

		if($list->count() % 2 != 0)
		{
			$this->addEmpty();
		}

		$cnt = $list->count()/2;

		$f = 0;

		$l = $list->count()-1;
			
		$first = $list->offsetGet($f);

		$last = $list->offsetGet($l);

		while (true) {

			echo $this->nameT. ', ' . $this->date . "</br>";

			for($i=0; $i<$cnt; $i++)
			{
				$pair = $first->getName() . ' - ' . $last->getName() . "</br>";

				if(strripos($pair, 'JohnDoe') !== false )
					$pair = '';

				echo $pair;

				$last = $list->offsetGet(--$l);

				$first = $list->offsetGet(++$f);
			}

			$this->nextDay();

			$newLast = $list->pop();

			$list->add(1, $newLast);

			$f = 0;

			$l = $list->count()-1;

			$first = $list->offsetGet($f);

			$last = $list->offsetGet($l);

			if($last == $this->last)
				break;
		}
	}
}

?>