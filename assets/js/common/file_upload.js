   // Generic file upload function
        async function uploadFile(file) {
            if (!file) {
                return null; // No file selected
            }

            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await fetch('ajax/upload_file.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                console.log('File upload response:', data);

                if (data.success && data.file_id && data.filepath) {
                    return {
                        file_id: data.file_id,
                        filepath: data.filepath
                    };
                } else {
                    throw new Error(data.message || 'File upload failed');
                }
            } catch (error) {
                console.error('Error uploading file:', error);
                return error;
            }
        }