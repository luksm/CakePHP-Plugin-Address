<?php
App::uses('AddressAppController', 'Address.Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
 */
class CountriesController extends AddressAppController
{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Sets the default pagination settings up
 *
 * Override this method or the index() action directly if you want to change
 * pagination settings. admin_index()
 *
 * @return void
 */
    protected function _setupAdminPagination() {
        $this->Paginator->settings = array(
            'limit' => 20,
            'order'=> array("Country.country" => "ASC")
        );
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index()
    {
        $this->_setupAdminPagination();
        $this->Paginator->settings[$this->modelClass]['recursive'] = 0;

		$this->set('countries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
        try {
            $country = $this->{$this->modelClass}->findById($id);
        } catch (NotFoundException $e) {
            $this->Session->setFlash(__d('users', 'Invalid country.'));
            $this->redirect(array('action' => 'index'));
        }

        $this->set('country', $country);
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->{$this->modelClass}->create();
			if ($this->{$this->modelClass}->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->{$this->modelClass}->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->{$this->modelClass}->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Country.' . $this->{$this->modelClass}->primaryKey => $id));
			$this->request->data = $this->{$this->modelClass}->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->{$this->modelClass}->id = $id;
		if (!$this->{$this->modelClass}->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->{$this->modelClass}->delete()) {
			$this->Session->setFlash(__('The country has been deleted.'));
		} else {
			$this->Session->setFlash(__('The country could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
