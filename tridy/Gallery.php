<?php
/*
 http://www.itnetwork.cz
 */

/**
 * Reprezentuje galerii
 */
class Galerie
{
	/**
	 * @var array Soubory galerie
	 */
	private array $soubory = array();

	/**
	 * Konstruktor
	 * @param string $slozka Složka galerie
	 * @param int $sloupcu Počet sloupců galerie
	 */
	public function __construct(private string $slozka, private int $sloupcu) {}

	/**
	 * Načte složku galerie
	 * @return void
	 */
	public function nacti(): void
	{
		$slozka = dir($this->slozka);

		while ($polozka = $slozka->read()) {
			if (strpos($polozka, '_nahled.') && is_file($this->slozka . '/' . $polozka)) {
				$this->soubory[] = $polozka;
			}
		}
		$slozka->close();
	}

	/**
	 * Vykreslí galerii
	 * @return void
	 */
	public function vypis(): void
	{
		echo('<table id="galerie"><tr>');
		$sloupec = 0;
		foreach ($this->soubory as $soubor) {
			$nahled = $this->slozka . '/' . $soubor;
			$obrazek = $this->slozka . '/' . str_replace('_nahled.', '.', $soubor);
			echo('<td><a href="' . htmlspecialchars($obrazek) . '" rel="lightbox[galerie]"><img src="' . htmlspecialchars($nahled) . '" alt=""></a></td>');
			$sloupec++;
			if ($sloupec >= $this->sloupcu) {
				echo('</tr><tr>');
				$sloupec = 0;
			}
		}
		echo('</tr></table>');
	}
}