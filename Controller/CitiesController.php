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
            'order' => array(
                $this->modelClass . '.created' => 'desc'
            )
        );
    }

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
        $this->set('result', $this->{$this->modelClass}->getByState($state));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->_setupAdminPagination();
        $this->Paginator->settings[$this->modelClass]['recursive'] = 2;
        $this->{$this->modelClass}->unBindModel(array("hasMany" => array("Neighbourhood")));
        $this->set('cities', $this->Paginator->paginate());
        $this->set('countries', $this->{$this->modelClass}->State->Country->find('list'));
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
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        $options = array('conditions' => array('City.' . $this->{$this->modelClass}->primaryKey => $id));
        $this->set('city', $this->{$this->modelClass}->find('first', $options));
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
                $this->Session->setFlash(__('The city has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
            }
        }
        $countries = $this->{$this->modelClass}->State->Country->find('list', array("fields" => array("Country.abbr", "Country.country")));
        $this->set('countries', $countries);
        $this->set('states', $this->{$this->modelClass}->State->getByCountry(key($countries)));
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
        if (!$this->{$this->modelClass}->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->{$this->modelClass}->save($this->request->data)) {
                $this->Session->setFlash(__('The city has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('City.' . $this->{$this->modelClass}->primaryKey => $id));
            $this->request->data = $this->{$this->modelClass}->find('first', $options);
            $country = $this->{$this->modelClass}->State->Country->findById($this->request->data['State']['country_id']);
            $this->set('country', $country['Country']['abbr']);
        }
        $this->set('states', $this->{$this->modelClass}->State->find('list', array("conditions" => array("State.country_id" => $this->request->data['State']['country_id']))));
        $countries = $this->{$this->modelClass}->State->Country->find('list', array("fields" => array("Country.abbr", "Country.country")));
        $this->set('countries', $countries);
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
        $this->{$this->modelClass}->id = $id;
        if (!$this->{$this->modelClass}->exists()) {
            throw new NotFoundException(__('Invalid city'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->{$this->modelClass}->delete()) {
            $this->Session->setFlash(__('The city has been deleted.'));
        } else {
            $this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
