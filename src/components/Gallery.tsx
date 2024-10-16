// src/components/Gallery.tsx
import React, { useState, useEffect } from 'react';
import { Row, Col, Button } from 'antd';
import { PlusOutlined } from '@ant-design/icons';
import { getImageList, deleteImage } from '../api';
import ImageCard from './ImageCard';
import ImageUploadModal from './ImageUploadModal';
import FullScreenImageModal from './FullScreenImageModal';

interface Image {
  id: number;
  title: string;
  image_path: string;
}

const Gallery: React.FC = () => {
  const [images, setImages] = useState<Image[]>([]);
  const [showModal, setShowModal] = useState(false);
  const [fullScreenImage, setFullScreenImage] = useState<string | null>(null);
  const [hover, setHover] = useState(false);

  useEffect(() => {
    fetchImages();
  }, []);

  const fetchImages = async () => {
    try {
      const data = await getImageList();
      setImages(data);
    } catch (error) {
      console.error('Error fetching images:', error);
    }
  };

  const handleDelete = async (id: number) => {
    try {
      await deleteImage(id);
      fetchImages(); // Refresh images after deletion
    } catch (error) {
      console.error('Error deleting image:', error);
    }
  };

  const toggleModal = () => {
    setShowModal(!showModal);
  };

  const handleImageClick = (imagePath: string) => {
    setFullScreenImage(imagePath);
  };

  const closeFullScreenModal = () => {
    setFullScreenImage(null);
  };

  return (
    <div className="gallery" style={{ overflowX: 'hidden'}}>
      <Row gutter={[16, 16]}>
        {images.map((image) => (
          <Col key={image.id} xs={24} sm={12} md={8} lg={6}>
            <ImageCard
              image={image}
              onDelete={handleDelete}
              onClick={() => handleImageClick(`http://localhost:8000/storage/${image.image_path}`)}
            />
          </Col>
        ))}
      </Row>

      <ImageUploadModal visible={showModal} toggleModal={toggleModal} onUpload={fetchImages} />
      <Button 
        type="primary" 
        icon={<PlusOutlined />} 
        onMouseEnter={() => setHover(true)}
        onMouseLeave={() => setHover(false)}
        onClick={toggleModal} 
        style={{ margin: '50px 0',backgroundColor: hover ? 'black' : 'green',fontWeight: '300',}}
        className='bg-red'
      >
        Add Image
      </Button>
      {fullScreenImage && (
        <FullScreenImageModal visible={!!fullScreenImage} image={fullScreenImage} onClose={closeFullScreenModal} />
      )}
    </div>
  );
};

export default Gallery;
