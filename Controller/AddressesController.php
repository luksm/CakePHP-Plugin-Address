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
     * Search zip method
     *
     * @param string $zip Addresses zip
     *
     * @return void
     */
    public function searchZip($zip = false)
    {
        $this->set('zip', $zip);
    }

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
        $cities = $this->Address->City->find('list');
        $neighbourhoods = $this->Address->Neighbourhood->find('list');
        $this->set(compact('cities', 'neighbourhoods'));
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
        $cities = $this->Address->City->find('list');
        $neighbourhoods = $this->Address->Neighbourhood->find('list');
        $this->set(compact('cities', 'neighbourhoods'));
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
