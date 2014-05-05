<?php
App::uses('AddressAppController', 'Address.Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StatesController extends AddressAppController
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
            'order'=> array("Country.country" => "ASC", "State.state" => "ASC"),
        );
    }

    /**
     * return states by countty
     *
     * @param string $country country Abbr
     *
     * @return void
     */
    public function byCountry($country)
    {
        $this->layout = 'ajax';
        $this->set('result', $this->State->getByCountry($country));
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

        $this->set('states', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id State ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        $options = array('conditions' => array('State.' . $this->{$this->modelClass}->primaryKey => $id));
        $this->set('state', $this->{$this->modelClass}->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->{$this->modelClass}->create();
            if ($this->{$this->modelClass}->save($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
            }
        }
        $countries = $this->{$this->modelClass}->Country->find('list');
        $this->set(compact('countries'));
    }

    /**
     * admin_edit method
     *
     * @param string $id State ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->{$this->modelClass}->save($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('State.' . $this->{$this->modelClass}->primaryKey => $id));
            $this->request->data = $this->{$this->modelClass}->find('first', $options);
        }
        $countries = $this->{$this->modelClass}->Country->find('list');
        $this->set(compact('countries'));
    }

    /**
     * admin_delete method
     *
     * @param string $id State ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->{$this->modelClass}->id = $id;
        if (!$this->{$this->modelClass}->exists()) {
            throw new NotFoundException(__('Invalid state'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->{$this->modelClass}->delete()) {
            $this->Session->setFlash(__('The state has been deleted.'));
        } else {
            $this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
