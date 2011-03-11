<?php
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/collections/MapEntry.php');
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/collections/Set.php');
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/collections/Collection.php');

class Map extends Collection {
	/**
	 * @AssociationType NeoBase.collections.MapEntry
	 */
	private $_unnamed_MapEntry_;

	/**
	 * @ReturnType boolean
	 * @ParamType key mixed
	 * Retorna "true" caso este mapa contenha um mapeamento para a chave especificada.
	 */
	public function containsKey($key) {
		// Not yet implemented
	}

	/**
	 * @ReturnType boolean
	 * @ParamType value mixed
	 * Retorna "true" caso este mapa mapeie uma ou mais chaves para o valor especificado.
	 */
	public function containsValue($value) {
		// Not yet implemented
	}

	/**
	 * @ReturnType NeoBase.collections.Set
	 * Retorna um set view dos mapeamentos contidos neste mapa.
	 */
	public function entrySet() {
		// Not yet implemented
	}

	/**
	 * @ReturnType Component 2
	 * @ParamType key mixed
	 * Retorna o valor referenciado por esta chave no mapa.
	 */
	public function get($key) {
		// Not yet implemented
	}

	/**
	 * @ReturnType NeoBase.collections.Set
	 * Retorna um set vew das chaves contidas neste mapa.
	 */
	public function keySet() {
		// Not yet implemented
	}

	/**
	 * @ReturnType Component 2
	 * @ParamType key mixed
	 * @ParamType value mixed
	 * Associa o valor especificado com a chave especificada neste mapa (operaчуo opcional).
	 */
	public function put($key, $value) {
		// Not yet implemented
	}

	/**
	 * @ParamType map map
	 * Copia todos os mapeamentos do mapa especificado para este mapa (operaчуo opcional).
	 */
	public function putAll(map $map) {
		// Not yet implemented
	}

	/**
	 * @ReturnType mixed
	 * @ParamType key mixed
	 * Remove o mapeamento para esta chave deste mapa, caso exista (operaчуo opcional).
	 */
	public function remove($key) {
		// Not yet implemented
	}

	/**
	 * @ReturnType NeoBase.collections.Collection
	 * Retorna um collection view dos valores contidos neste mapa.
	 */
	public function values() {
		// Not yet implemented
	}
}
?>