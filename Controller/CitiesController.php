<?php
App::uses('AddressAppController', 'Address.Controller');
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 */
class CitiesController extends AddressAppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * return cities by countty
     *
     * @param string $state state Abbr
     *
     * @return void
     */
    public function byState($state)
    {
        $this->layout = 'ajax';
        $this->set('result', $this->City->getByState($state));
    }
    
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->City->recursive = 0;
        $this->set('cities', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id City ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->City->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
        $this->set('city', $this->City->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->City->create();
            if ($this->City->save($this->request->data)) {
                $this->Session->setFlash(__('The city has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
            }
        }
        $states = $this->City->State->find('list');
        $this->set(compact('states'));
    }

    /**
     * admin_edit method
     *
     * @param string $id City ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->City->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->City->save($this->request->data)) {
                $this->Session->setFlash(__('The city has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
            $this->request->data = $this->City->find('first', $options);
        }
        $states = $this->City->State->find('list');
        $this->set(compact('states'));
    }

    /**
     * admin_delete method
     *
     * @param string $id City ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->City->id = $id;
        if (!$this->City->exists()) {
            throw new NotFoundException(__('Invalid city'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->City->delete()) {
            $this->Session->setFlash(__('The city has been deleted.'));
        } else {
            $this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
