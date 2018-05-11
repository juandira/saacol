<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cleanings Controller
 *
 * @property \App\Model\Table\CleaningsTable $Cleanings
 *
 * @method \App\Model\Entity\Cleaning[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CleaningsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assets']
        ];
        $cleanings = $this->paginate($this->Cleanings);

        $this->set(compact('cleanings'));
    }

    /**
     * View method
     *
     * @param string|null $id Cleaning id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cleaning = $this->Cleanings->get($id, [
            'contain' => ['Assets']
        ]);

        $this->set('cleaning', $cleaning);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cleaning = $this->Cleanings->newEntity();
        if ($this->request->is('post')) {
            $cleaning = $this->Cleanings->patchEntity($cleaning, $this->request->getData());
            if ($this->Cleanings->save($cleaning)) {
                $this->Flash->success(__('The cleaning has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cleaning could not be saved. Please, try again.'));
        }
        $assets = $this->Cleanings->Assets->find('list', ['limit' => 200]);
        $this->set(compact('cleaning', 'assets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cleaning id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cleaning = $this->Cleanings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cleaning = $this->Cleanings->patchEntity($cleaning, $this->request->getData());
            if ($this->Cleanings->save($cleaning)) {
                $this->Flash->success(__('The cleaning has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cleaning could not be saved. Please, try again.'));
        }
        $assets = $this->Cleanings->Assets->find('list', ['limit' => 200]);
        $this->set(compact('cleaning', 'assets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cleaning id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cleaning = $this->Cleanings->get($id);
        if ($this->Cleanings->delete($cleaning)) {
            $this->Flash->success(__('The cleaning has been deleted.'));
        } else {
            $this->Flash->error(__('The cleaning could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
