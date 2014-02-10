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
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->State->recursive = 0;
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
        if (!$this->State->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
        $this->set('state', $this->State->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->State->create();
            if ($this->State->save($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
            }
        }
        $countries = $this->State->Country->find('list');
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
        if (!$this->State->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->State->save($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
            $this->request->data = $this->State->find('first', $options);
        }
        $countries = $this->State->Country->find('list');
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
        $this->State->id = $id;
        if (!$this->State->exists()) {
            throw new NotFoundException(__('Invalid state'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->State->delete()) {
            $this->Session->setFlash(__('The state has been deleted.'));
        } else {
            $this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
