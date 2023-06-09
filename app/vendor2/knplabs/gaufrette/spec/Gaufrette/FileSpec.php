<?php

namespace spec\Gaufrette;

use Gaufrette\Filesystem;
use PhpSpec\ObjectBehavior;

interface MetadataAdapter extends \Gaufrette\Adapter,
    \Gaufrette\Adapter\MetadataSupporter
{
}

class FileSpec extends ObjectBehavior
{
    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function let(Filesystem $filesystem)
    {
        $this->beConstructedWith('filename', $filesystem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\File');
    }

    function it_gives_access_to_key()
    {
        $this->getKey()->shouldReturn('filename');
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_gets_content(Filesystem $filesystem)
    {
        $filesystem->read('filename')->shouldBeCalled()->willReturn('Some content');

        $this->getContent()->shouldReturn('Some content');
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_gets_mtime(Filesystem $filesystem)
    {
        $filesystem->mtime('filename')->shouldBeCalled()->willReturn(1358797854);

        $this->getMtime()->shouldReturn(1358797854);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     * @param \spec\Gaufrette\MetadataAdapter $adapter
     */
    function it_pass_metadata_when_write_content(Filesystem $filesystem, MetadataAdapter $adapter)
    {
        $metadata = ['id' => '123'];
        $adapter->setMetadata('filename', $metadata)->shouldBeCalled();
        $filesystem->write('filename', 'some content', true)->willReturn(12);
        $filesystem->getAdapter()->willReturn($adapter);

        $this->setContent('some content', $metadata);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     * @param \spec\Gaufrette\MetadataAdapter $adapter
     */
    function it_pass_metadata_when_read_content(Filesystem $filesystem, MetadataAdapter $adapter)
    {
        $metadata = ['id' => '123'];
        $adapter->setMetadata('filename', $metadata)->shouldBeCalled();
        $filesystem->read('filename')->willReturn('some content');
        $filesystem->getAdapter()->willReturn($adapter);

        $this->getContent($metadata);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     * @param \spec\Gaufrette\MetadataAdapter $adapter
     */
    function it_pass_metadata_when_delete_content(Filesystem $filesystem, MetadataAdapter $adapter)
    {
        $metadata = ['id' => '123'];
        $adapter->setMetadata('filename', $metadata)->shouldBeCalled();
        $filesystem->delete('filename')->willReturn(true);
        $filesystem->getAdapter()->willReturn($adapter);

        $this->delete($metadata);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     * @param \spec\Gaufrette\MetadataAdapter $adapter
     */
    function it_sets_content_of_file(Filesystem $filesystem, MetadataAdapter $adapter)
    {
        $adapter->setMetadata('filename', [])->shouldNotBeCalled();
        $filesystem->getAdapter()->willReturn($adapter);
        $filesystem->write('filename', 'some content', true)->shouldBeCalled()->willReturn(21);

        $this->setContent('some content')->shouldReturn(21);
        $this->getContent('filename')->shouldReturn('some content');
    }

    function it_sets_key_as_name_by_default()
    {
        $this->getName()->shouldReturn('filename');
    }

    function it_sets_name()
    {
        $this->setName('name');
        $this->getName()->shouldReturn('name');
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_sets_size_for_new_file(Filesystem $filesystem)
    {
        $filesystem->write('filename', 'some content', true)->shouldBeCalled()->willReturn(21);

        $this->setContent('some content');
        $this->getSize()->shouldReturn(21);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_calculates_size_from_filesystem(Filesystem $filesystem)
    {
        $filesystem->size('filename')->shouldBeCalled()->willReturn(12);

        $this->getSize()->shouldReturn(12);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_allows_to_set_size(Filesystem $filesystem)
    {
        $filesystem->read('filename')->shouldNotBeCalled();

        $this->setSize(21);
        $this->getSize()->shouldReturn(21);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_gets_zero_size_when_file_not_found(Filesystem $filesystem)
    {
        $filesystem->size('filename')->willThrow(new \Gaufrette\Exception\FileNotFound('filename'));

        $this->getSize()->shouldReturn(0);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_check_if_file_with_key_exists_in_filesystem(Filesystem $filesystem)
    {
        $filesystem->has('filename')->willReturn(true);
        $this->exists()->shouldReturn(true);

        $filesystem->has('filename')->willReturn(false);
        $this->exists()->shouldReturn(false);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_deletes_file_from_filesystem(Filesystem $filesystem)
    {
        $filesystem->delete('filename')->shouldBeCalled()->willReturn(true);
        $this->delete()->shouldReturn(true);
    }

    /**
     * @param \Gaufrette\Filesystem $filesystem
     */
    function it_renames_file_from_filesystem(Filesystem $filesystem)
    {
        $filesystem->rename('filename', 'newname')->shouldBeCalled();
        $this->rename('newname');
    }
}
