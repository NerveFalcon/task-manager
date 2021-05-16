<?php
class View
{
	public function Generate($contentView, $params = null, $templateView = "templateView.php")
	{
		include "app/views/" . $templateView;
	}

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
	public static function buildPageBtnsContainer(int $countPage, int $currentPage, string $url)
	{
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
	public static function buildPageBtns(int $firstPage, int $countPage, int $currentPage, string $url)
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
	public static function buildPageBtn(int $buildPage, string $url, int $currentPage = null)
	{
		$class = '';
		if ($currentPage == $buildPage)
		{
			$class .= 'currentPage';
		}
		return "<a href='$url/$buildPage' class='flex-item-row'><fromphp class='$class'>$buildPage</fromphp></a>";
	}
}
