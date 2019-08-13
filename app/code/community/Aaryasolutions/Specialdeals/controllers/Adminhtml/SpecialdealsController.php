<?php


class Aaryasolutions_Specialdeals_Adminhtml_SpecialdealsController extends Mage_Adminhtml_Controller_Action

{

public function indexAction() {
		$this->_initAction()
			->_addContent($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals'))
			->renderLayout();
	}

	public function ordersAction(){

		$this->_initAction()
			->_addContent($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tab_orders'))
			->renderLayout();
	}

	protected function _initAction() {
		$this->loadLayout();
			
		return $this;
	} 

	public function newAction() {

		//$this->_forward('edit');
		$this->_initAction();
		$this->_addContent($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit'))
				->_addLeft($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tabs'));

			$this->renderLayout();
	}


	public function editAction() {


		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('specialdeals/specialdeals')->load($id);

		if ($model->getId() || $id == 0) {

			$this->_initAction();

			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('specialdeals_data', $model);

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit'))
				->_addLeft($this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('specialdeals')->__('Deal does not exist'));
			$this->_redirect('*/*/');
		}
	}

	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('specialdeals/specialdeals');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Deal was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

	public function massDeleteAction() {
        $specialdealsIds = $this->getRequest()->getParam('specialdeals');
        if(!is_array($specialdealsIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select deal(s)'));
        } else {
            try {
                foreach ($specialdealsIds as $specialdealsId) {
                    $hbb = Mage::getModel('specialdealss/specialdeals')->load($specialdealsId);
                    $hbb->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($specialdealsIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }


    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tab_orders')->toHtml()
        );
    }

    public function exportCsvAction() {

    	$pid=Mage::app()->getRequest()->getParam('pid');
        $fileName = 'special_deal'.$pid.'.csv';
        $content = $this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tab_orders')
                        ->getCsv();
        $this->_sendUploadResponse($fileName, $content);
    }

	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			

            
	  			
	  			
			$model = Mage::getModel('specialdeals/specialdeals');
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));

			try {
					
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('specialdeals')->__('Specialdeal was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('specialdeals')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}

	 protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream') {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK', '');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename=' . $fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }


}

?>