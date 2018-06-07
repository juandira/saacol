<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assets Controller
 *
 * @property \App\Model\Table\AssetsTable $Assets
 *
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssetsController extends AppController
{
	public function export() {
		$datatbl='';
		$datatbl = '<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;" border="1" width="60%">';
		
		$datatbl .= '<tr>
						<th style="text-align:center;">Id</th>
						<th style="text-align:center;">Date</th>
						<th style="text-align:center;">Name</th>
						<th style="text-align:center;">Observation</th>
					</tr>';
		$assets = $this->Assets->find('all')->toArray();
		foreach($assets as $assets){
			$id = $assets['id'];
			$date = $assets['date'];
			$name = $assets['name'];
			$observation = $assets['observation'];
			$datatbl .= '<tr>
							<td style="text-align:center;">'. $id .'</td>
							<td style="text-align:center;">'. $date .'</td>
							<td style="text-align:center;">'. $name .'</td>
							<td style="text-align:center;">'. $observation .'</td>
						</tr>';
		}
		$datatbl .= "</table>";
		
			// Excel Export
			header('Content-Type: application/force-download');
			header('Content-disposition: attachment; filename= reporte.xls');
			header("Pragma: ");
			header("Cache-Control: ");
			echo $datatbl;
			die;
	}
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classifications', 'Brands', 'Users']
        ];
        $assets = $this->paginate($this->Assets);

        $this->set(compact('assets'));
    }

    /**
     * View method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => ['Classifications', 'Brands', 'Users', 'Cleanings']
        ]);

        $this->set('asset', $asset);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asset = $this->Assets->newEntity();
        if ($this->request->is('post')) {
            $asset = $this->Assets->patchEntity($asset, $this->request->getData());
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asset could not be saved. Please, try again.'));
        }
        $classifications = $this->Assets->Classifications->find('list', ['limit' => 200]);
        $brands = $this->Assets->Brands->find('list', ['limit' => 200]);
        $users = $this->Assets->Users->find('list', ['limit' => 200]);
        $this->set(compact('asset', 'classifications', 'brands', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asset = $this->Assets->patchEntity($asset, $this->request->getData());
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asset could not be saved. Please, try again.'));
        }
        $classifications = $this->Assets->Classifications->find('list', ['limit' => 200]);
        $brands = $this->Assets->Brands->find('list', ['limit' => 200]);
        $users = $this->Assets->Users->find('list', ['limit' => 200]);
        $this->set(compact('asset', 'classifications', 'brands', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asset = $this->Assets->get($id);
        if ($this->Assets->delete($asset)) {
            $this->Flash->success(__('The asset has been deleted.'));
        } else {
            $this->Flash->error(__('The asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
