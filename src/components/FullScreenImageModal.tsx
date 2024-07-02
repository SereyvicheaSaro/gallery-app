// src/components/FullScreenImageModal.tsx
import React from 'react';
import { Modal } from 'antd';

interface FullScreenImageModalProps {
  visible: boolean;
  image: string;
  onClose: () => void;
}

const FullScreenImageModal: React.FC<FullScreenImageModalProps> = ({ visible, image, onClose }) => {
  return (
    <Modal
      visible={visible}
      footer={null}
      onCancel={onClose}
      width="50%"
      bodyStyle={{ padding: 0 }}
    >
      <img src={image} alt="full-screen" style={{ width: '100%' }} />
    </Modal>
  );
};

export default FullScreenImageModal;
