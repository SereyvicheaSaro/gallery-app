// src/components/ImageUploadModal.tsx
import React, { useState } from 'react';
import { Modal, Form, Upload, Button, message } from 'antd';
import { UploadOutlined } from '@ant-design/icons';
import { createImage } from '../api';

interface ImageUploadModalProps {
  visible: boolean;
  toggleModal: () => void;
  onUpload: () => void;
}

const ImageUploadModal: React.FC<ImageUploadModalProps> = ({ visible, toggleModal, onUpload }) => {
  const [form] = Form.useForm();
  const [fileList, setFileList] = useState<any[]>([]);  // Adjust type as per your needs

  const handleUpload = async () => {
    try {
      const formData = new FormData();
      formData.append('image', fileList[0].originFileObj);
      formData.append('title', form.getFieldValue('title'));

      await createImage(formData);
      message.success('Image uploaded successfully');
      onUpload();  // Refresh images after upload
      toggleModal();  // Close modal
      form.resetFields();  // Clear form fields
      setFileList([]);  // Clear file list
    } catch (error) {
      console.error('Error uploading image:', error);
      message.error('Failed to upload image');
    }
  };

  const handleFileChange = ({ fileList }: { fileList: any[] }) => {
    setFileList(fileList);
  };

  return (
    <Modal
      title="Upload Image"
      visible={visible}
      onCancel={toggleModal}
      footer={[
        <Button key="back" onClick={toggleModal}>
          Cancel
        </Button>,
        <Button key="submit" type="primary" onClick={handleUpload}>
          Upload
        </Button>,
      ]}
    >
      <Form form={form} layout="vertical">
        <Form.Item name="title" label="Title" rules={[{ required: true, message: 'Please enter a title' }]}>
          <input style={{backgroundColor:"white"}} className="ant-input" />
        </Form.Item>
        <Form.Item name="image" label="Image" rules={[{ required: true, message: 'Please select an image' }]}>
          <Upload
            fileList={fileList}
            onChange={handleFileChange}
            beforeUpload={() => false}  // Disable automatic upload
          >
            <Button icon={<UploadOutlined />}>Select File</Button>
          </Upload>
        </Form.Item>
      </Form>
    </Modal>
  );
};

export default ImageUploadModal;
