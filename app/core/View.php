<?php
class View
{
	/**
	 * Генерация представления
	 * @param string $contentView Адрес создержимого страницы
	 * @param array|null $params Данные
	 * @param string $templateView Адрес шаблона
	 */
	public function Generate(string $contentView, array $params = null, string $templateView = "templateView.php")
	{
		include "app/views/" . $templateView;
	}

	/**
	 * Метод построения фильтра
	 * 
	 * @param int $currentPage Текущая страница
	 * 
	 * @return string html-код фильтра
	 */
	public static function BuildFilter(int $currentPage): string
	{

		$status = TaskModel::GetAllStatus();
		$result = "<div class=\"filter Tright\">";
		foreach ($status as $stat)
		{
			$href = TaskModel::FilterSetting($stat['en']) . "/$currentPage";
			$color = $stat['color'];
			$result .= "<a class=\"element bg-$color\" href=\"../$href\"></a> ";
		}
		$result .= "</div>";
		return $result;
	}

	public static function Test()
	{
		for ($i = 0; $i < 10; $i++)
		{
			yield $_SESSION[$i] = $i;
		}
	}


	public static function JsAlertOnLoad(string $text)
	{
		return "
		<script>
			window.onload = function() {
				alert(\"$text\");
			};
		</script>";
	}

	#region	paggination

	/**
	 * Метод построения контейнера кнопок переключения страниц
	 * зависящий от количества страниц
	 * 
	 * @param int $countPage Количество страниц
	 * @param int $currentPage Текущая страница
	 * @param string $url Адрес 1й страницы
	 * 
	 * @return string html-код паггинации
	 */
	public static function buildPageBtnsContainer(int $countPage, int $currentPage)
	{
		$url = explode('/', Route::GetURI());
		if (is_numeric($url[count($url) - 1]))
			unset($url[count($url) - 1]);
		$url = implode('/', $url);

		$firstPage = 1;
		if ($countPage < 2)
		{
			return false;
		}
		$container = '<div class="pg-btn flex-container-row flex-center">';
		if ($countPage < 7)
		{
			$container .= self::buildPageBtns(1, $countPage, $currentPage, $url);
		}
		else
		{
			$condition = ($currentPage < $firstPage + 3) ? -1 : (($currentPage > $countPage - 3) ? 1 : 0);
			switch ($condition)
			{
				case -1:
					$container .= self::buildPageBtns($firstPage, $firstPage + 3, $currentPage, $url);
					$container .= "..." . self::buildPageBtn($countPage, $url);
					break;
				case 0:
					$container .= self::buildPageBtn(1, $url);
					$container .= "..." . self::buildPageBtns($currentPage - 1, $currentPage + 1, $currentPage, $url);
					$container .= "..." . self::buildPageBtn($countPage, $url);
					break;
				case 1:
					$container .= self::buildPageBtn(1, $url);
					$container .= "..." . self::buildPageBtns($countPage - 3, $countPage, $currentPage, $url);
					break;
			}
		}
		$container .= '</div>';
		return $container;
	}

	/**
	 * Метод постороения набора кнопок переключения страниц
	 * 
	 * @param int $firstPage Номер страницы c которой начинается построение
	 * @param int $countPage Количество страниц
	 * @param int $currentPage Номер текущей страницы
	 * @return string html-код вида { a.flex-item-row > fromphp > n }
	 */
	private static function buildPageBtns(int $firstPage, int $countPage, int $currentPage, string $url)
	{
		$buttons = "";
		for ($i = $firstPage; $i <= $countPage; $i++)
		{
			$buttons .= self::buildPageBtn($i, $url, $currentPage);
		}
		return $buttons;
	}

	/**
	 * Метод построения отдельной кнопки переключения страниц
	 * 
	 * @param int $buildPage Номер страницы
	 * @param int $currentPage Номер текущей страницы
	 * @return string html-код
	 */
	private static function buildPageBtn(int $buildPage, string $url, int $currentPage = null)
	{
		$class = '';
		if ($currentPage == $buildPage)
		{
			$class .= 'currentPage';
		}
		return "<a href='/$url/$buildPage' class='flex-item'><fromphp class='$class'>$buildPage</fromphp></a>";
	}

	#endregion
}
