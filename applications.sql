CREATE TABLE applications (
  bundleId VARCHAR(255) NOT NULL,
  name TEXT,
  vendor TEXT,
  price INT
);

ALTER TABLE applications
ADD CONSTRAINT unique_bundleID UNIQUE (bundleId);