<?php
App::uses('AddressAppController', 'Address.Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 */
class AddressesController extends AddressAppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * zip method
     *
     * @param string $zip Addresses zip
     *
     * @return void
     */
    public function zip($zip)
    {
        $this->layout = 'ajax';
        $this->set('addresses', $this->Address->getByZip($zip));
    }

    /**
     * Search zip method
     *
     * @param string $zip Addresses zip
     *
     * @return void
     */
    public function admin_searchZip($zip = false)
    {
        $this->set('zip', $zip);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Address->recursive = 0;
        $this->set('addresses', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id Address ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->Address->exists($id)) {
            throw new NotFoundException(__('Invalid address'));
        }
        $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
        $this->set('address', $this->Address->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Address->create();
            if ($this->Address->save($this->request->data)) {
                $this->Session->setFlash(__('The address has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The address could not be saved. Please, try again.'));
            }
        }
        $neighbourhoods = $this->Address->Neighbourhood->find('list');
        $cities = $this->Address->Neighbourhood->City->find('list');
        $states = $this->Address->Neighbourhood->City->State->find('list');
        $this->set(compact('states', 'cities', 'neighbourhoods'));
    }

    /**
     * admin_edit method
     *
     * @param string $id Address ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->Address->exists($id)) {
            throw new NotFoundException(__('Invalid address'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Address->save($this->request->data)) {
                $this->Session->setFlash(__('The address has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The address could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
            $this->request->data = $this->Address->find('first', $options);
        }
        $neighbourhoods = $this->Address->Neighbourhood->find('list');
        $cities = $this->Address->Neighbourhood->City->find('list');
        $states = $this->Address->Neighbourhood->City->State->find('list');
        $this->set(compact('states', 'cities', 'neighbourhoods'));
    }

    /**
     * admin_delete method
     *
     * @param string $id Address ID
     *
     * @throws NotFoundException
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->Address->id = $id;
        if (!$this->Address->exists()) {
            throw new NotFoundException(__('Invalid address'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Address->delete()) {
            $this->Session->setFlash(__('The address has been deleted.'));
        } else {
            $this->Session->setFlash(__('The address could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
