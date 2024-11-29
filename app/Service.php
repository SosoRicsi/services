<?php declare(strict_types=1);

namespace SosoRicsi\Services;

/**
 * Class App
 *
 * Az `App` osztály a framework fő belépési pontjaként szolgál,
 * amely tárolja az alkalmazás fő konténerét és router objektumát.
 */
class Service
{

	/**
	 * @var object $container Tárolja az alkalmazás konténerét, amely az egyes komponensek regisztrálására és elérésére szolgál.
	 */
	protected static object $container;

	/**
	 * Beállítja az alkalmazás konténerét.
	 *
	 * @param object $container Egy objektum, amely a konténerként szolgál.
	 */
	public static function setContainer(object $container): void
	{
		static::$container = $container;
	}

	public static function bind(string $key, callable|object $container): void
	{
		static::$container->bind($key, $container);
	}

	/**
	 * Visszaad egy komponenst a konténerből az adott kulcs alapján.
	 *
	 * @param string $key A lekérdezett komponens kulcsa.
	 * @return mixed A konténerből visszaadott komponens.
	 */
	public static function container(string $key): mixed
	{
		return static::$container->take($key);
	}

}
