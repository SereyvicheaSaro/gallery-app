import React from 'react';
import { Card, Button, Popconfirm, message } from 'antd';
import { DeleteOutlined } from '@ant-design/icons';

interface ImageCardProps {
  image: {
    id: number;
    title: string;
    image_path: string;
  };
  onDelete: (id: number) => void;
  onClick: () => void;
}

const ImageCard: React.FC<ImageCardProps> = ({ image, onDelete, onClick }) => {

  const confirm = () => {
    onDelete(image.id);
    message.success('Image deleted successfully');
  };

  const cancel = () => {
    message.error('Delete canceled');
  };

  return (
    <Card
      hoverable
      cover={<img alt={image.title} src={`http://localhost:8000/storage/${image.image_path}`} onClick={onClick} />}
      actions={[
        <Popconfirm
          key="delete"
          title="Are you sure to delete this image?"
          onConfirm={confirm}
          onCancel={cancel}
          okText="Yes"
          cancelText="No"
        >
          <Button type="primary" danger icon={<DeleteOutlined />} />
        </Popconfirm>,
      ]}
    >
      <Card.Meta title={image.title} />
    </Card>
  );
};

export default ImageCard;
