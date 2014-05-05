<?php
App::uses('AddressAppController', 'Address.Controller');
/**
 * Neighbourhoods Controller
 *
 * @property Neighbourhood $Neighbourhood
 * @property PaginatorComponent $Paginator
 */
class NeighbourhoodsController extends AddressAppController
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
            'order'=> array("Neighbourhood.neighbourhood" => "ASC")
        );
    }

    /**
     * return Neighbourhood by city
     *
     * @param string $city city Name
     *
     * @return void
     */
    public function byStateCity($city)
    {
        $this->layout = 'ajax';
        $this->set('result', $this->{$this->modelClass}->getByStateCity($city));
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

        $this->set('neighbourhoods', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id Neighbourhood ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        $options = array('conditions' => array('Neighbourhood.' . $this->{$this->modelClass}->primaryKey => $id));
        $this->set('neighbourhood', $this->{$this->modelClass}->find('first', $options));
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
                $this->Session->setFlash(__('The neighbourhood has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The neighbourhood could not be saved. Please, try again.'));
            }
        }
        $cities = $this->{$this->modelClass}->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * admin_edit method
     *
     * @param string $id Neighbourhood ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->{$this->modelClass}->save($this->request->data)) {
                $this->Session->setFlash(__('The neighbourhood has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The neighbourhood could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Neighbourhood.' . $this->{$this->modelClass}->primaryKey => $id));
            $this->request->data = $this->{$this->modelClass}->find('first', $options);
        }
        $cities = $this->{$this->modelClass}->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * admin_delete method
     *
     * @param string $id Neighbourhood ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->{$this->modelClass}->id = $id;
        if (!$this->{$this->modelClass}->exists()) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->{$this->modelClass}->delete()) {
            $this->Session->setFlash(__('The neighbourhood has been deleted.'));
        } else {
            $this->Session->setFlash(__('The neighbourhood could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
