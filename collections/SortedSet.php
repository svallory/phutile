<?php
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/collections/Comparator.php');
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/web/Component_2.php');
require_once(realpath(dirname(__FILE__)) . '/../../NeoBase/collections/Collection.php');

class SortedSet extends Collection {
	/**
	 * @AssociationType NeoBase.collections.Comparator
	 */
	private $_unnamed_Comparator_;

	/**
	 * @ReturnType NeoBase.collections.Comparator
	 * Retorna o comparador associado com este set, ou null caso use a ordem natural dos seus elementos.
	 */
	public function comparator() {
		// Not yet implemented
	}

	/**
	 * @ReturnType Component 2
	 * Retorna o primeiro(mais baixo) elemento deste set.
	 */
	public function first() {
		// Not yet implemented
	}

	/**
	 * @ParamType toComponent Neosystem.web.ui.Component 2
	 * Retorna os elementos do �nicio do grupo at� o elemento passado.
	 */
	public function headSet(Component_2 $toComponent) {
		// Not yet implemented
	}

	/**
	 * Retorna o �ltimo(mais alto) elemento deste set.
	 */
	public function last() {
		// Not yet implemented
	}

	/**
	 * @ParamType fromComponent Neosystem.web.ui.Component 2
	 * @ParamType toComponent Neosystem.web.ui.Component 2
	 * Retorna os elementos entre o primeiro (inclusive) e o �ltimo (exclusive).
	 */
	public function subSet(Component_2 $fromComponent, Component_2 $toComponent) {
		// Not yet implemented
	}

	/**
	 * @ParamType fromComponent Neosystem.web.ui.Component 2
	 * Retorna os elementos a partir do elemento passado (inclusive) at� o final do set.
	 */
	public function tailSet(Component_2 $fromComponent) {
		// Not yet implemented
	}
}
?>