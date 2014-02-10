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
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Neighbourhood->recursive = 0;
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
        if (!$this->Neighbourhood->exists($id)) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        $options = array('conditions' => array('Neighbourhood.' . $this->Neighbourhood->primaryKey => $id));
        $this->set('neighbourhood', $this->Neighbourhood->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Neighbourhood->create();
            if ($this->Neighbourhood->save($this->request->data)) {
                $this->Session->setFlash(__('The neighbourhood has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The neighbourhood could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Neighbourhood->City->find('list');
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
        if (!$this->Neighbourhood->exists($id)) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Neighbourhood->save($this->request->data)) {
                $this->Session->setFlash(__('The neighbourhood has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The neighbourhood could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Neighbourhood.' . $this->Neighbourhood->primaryKey => $id));
            $this->request->data = $this->Neighbourhood->find('first', $options);
        }
        $cities = $this->Neighbourhood->City->find('list');
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
        $this->Neighbourhood->id = $id;
        if (!$this->Neighbourhood->exists()) {
            throw new NotFoundException(__('Invalid neighbourhood'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Neighbourhood->delete()) {
            $this->Session->setFlash(__('The neighbourhood has been deleted.'));
        } else {
            $this->Session->setFlash(__('The neighbourhood could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
